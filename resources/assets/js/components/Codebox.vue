<template id="codebox-template">
    <codemirror ref="myEditor"
                :code="code"
                :options="editorOptions"
                @ready="onEditorReady"
                @focus="onEditorFocus"
                @change="onEditorCodeChange">
    </codemirror></template>

<script>
    import 'codemirror/keymap/sublime';

    //let io = require('socket.io-client');
    //let socket = io.connect('http://localhost:3000');

    export default {
        data () {
            return {
                custoEdit : {},
                code: '',
                editorOptions: {
                    tabSize: 4,
                    mode: 'text/javascript',
                    theme: 'base16-dark',
                    lineNumbers: true,
                    line: true,
                    keyMap: "sublime",
                    extraKeys: { "Ctrl": "autocomplete" },
                    foldGutter: true,
                    gutters: ["CodeMirror-linenumbers", "CodeMirror-foldgutter"],
                    styleSelectedText: true,
                    highlightSelectionMatches: { showToken: /\w/, annotateScrollbar: true },
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
            onEditorCodeChange(newCode) {
                let onLine = this.custoEdit.doc.getCursor().line;
                let lineContent = this.custoEdit.doc.getLine(onLine);
                console.log(onLine + ' Content : '+lineContent );
                this.$parent.socket('codeToServer', {
                    room : this.project,
                    line : onLine,
                    content : lineContent,
                });

            }
        },
        computed: {
            editor() {
                return this.$refs.codebox.editor
            }
        },
        mounted() {

        }
    }
</script>

<--! doc.getCursor(?start: string) → {line, ch}
Retrieve one end of the primary selection.
start is an optional string indicating which end
of the selection to return. It may be "from", "to",
"head" (the side of the selection that moves when you
press shift+arrow), or "anchor" (the fixed side of the selection).
Omitting the argument is the same as passing "head". A {line, ch}
object will be returned. -->