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
                    tabSize: 4,
                    mode: 'text/javascript',
                    theme: 'base16-light',
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
                // console.log(this);
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
                    });
                }
            },
            sendCode(content, project, folder, name){
                axios.post(`/api/saveCode`, {
                    body: {
                        content : content,
                        project : project,
                        folder : folder,
                        name : name

                    }
                })
            }
        },
        computed: {
            editor() {
                return this.$refs.codebox.editor
            }
        },
        props: ['user', 'project'],
        created(){

        },
        mounted() {
            let $this = this;
            this.axios.get('/api/getCode/test/html/index').then(function (response) {
                return $this.code = response.data;
            });
            setInterval(function(){
                $this.sendCode($this.code, 'test', 'html', 'index')
            }, 2000);




            this.$parent.socket.on('codeTo' + this.project, function (e) {
                $this.OnChangeSwitch = false;
                $this.custoEdit.doc.setValue(
                    e.content,
                );
                $this.OnChangeSwitch = true;
            });
        }
    }
</script>
