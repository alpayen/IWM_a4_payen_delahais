<template id="codebox-template">
    <codemirror ref="myEditor"
                :code="code"
                :options="editorOptions"
                @ready="onEditorReady"
                @focus="onEditorFocus"
                @change="onEditorCodeChange">
    </codemirror>
</template>

<script>
    import 'codemirror/keymap/sublime';
    import 'codemirror/addon/edit/matchtags.js';
    import 'codemirror/addon/edit/closetag.js';
    import 'codemirror/addon/edit/closebrackets.js';
    import 'codemirror/addon/lint/lint.js';
    //import 'codemirror/addon/lint/html-lint.js';
    //import 'codemirror/addon/lint/css-lint.js';
    //import 'codemirror/addon/lint/javascript-lint.js';
    //let io = require('socket.io-client');
    //let socket = io.connect('http://localhost:3000');
    export default {
        data() {
            return {
                axios : require('axios'),
                OnChangeSwitch: true,
                custoEdit: {},
                code: '',
                editorOptions: {
                    lint : true,
                    autoCloseTags : true,
                    matchTags : true,
                    autoCloseBrackets : true,
                    tabSize: 4,
                    mode: 'text/'+this.type,
                    theme: 'dracula',
                    lineNumbers: true,
                    line: true,
                    keyMap: "sublime",
                    extraKeys: {"Ctrl": "autocomplete"},
                    foldGutter: true,
                    gutters: ["CodeMirror-linenumbers", "CodeMirror-foldgutter"],
                    styleSelectedText: true,
                    highlightSelectionMatches: {showToken: /\w/, annotateScrollbar: true},
                }
            }
        },
        methods: {
            onEditorReady(editor) {
                this.custoEdit = editor;
            },
            onEditorFocus(editor) {
            },
            onEditorCodeChange(newCode, changeObj) {
                this.code = newCode;
                if (this.OnChangeSwitch) {
                    let onLine = this.custoEdit.doc.getCursor().line;
                    let lineContent = this.custoEdit.doc.getValue();
                    this.$parent.socket.emit('codeToServer', {
                        room: this.project,
                        line: onLine,
                        content: lineContent,
                        type : this.type
                    });
                }
            },
            sendCode(content, project_id, type){
                axios.post(`/api/saveCode`, {
                    body: {
                        content : content,
                        project_id : project_id,
                        type : type
                    }
                })
            }
        },
        computed: {
            editor() {
                return this.$refs.codebox.editor
            }
        },
        props: ['user', 'project', 'project_id', 'type'],
        created(){

        },
        mounted() {
            console.log(this.type);
            let $this = this;
            console.log(this.project_id);
            console.log(this.type);
            this.axios.get('/api/getCode/'+this.project_id+'/'+this.type).then(function (response) {
                console.log(response.data);
                return $this.code = response.data;
            });
            setInterval(function(){
                $this.sendCode($this.code, $this.project_id, $this.type)
            }, 2000);
            this.$parent.socket.on('codeTo' + this.project, function (e) {
                $this.OnChangeSwitch = false;
                console.log(e.type)
                console.log( $this.type)
                if(e.type == $this.type){
                    $this.custoEdit.doc.setValue(
                     e.content,
                );
                }
                $this.OnChangeSwitch = true;
            });
        }
    }
</script>
