<template id="codebox-template">
    <!-- Bidirectional data binding（双向数据绑定） -->
    <codemirror ref="myEditor"
                :code="code"
                :options="editorOptions"
                @ready="onEditorReady"
                @focus="onEditorFocus"
                @change="onEditorCodeChange">
    </codemirror></template>

<script>
    // Similarly, you can also introduce the resource pack you want to use within the component
    // require('codemirror/some-resource')
    import 'codemirror/keymap/sublime';
    export default {
        data () {
            return {
                code: '',
                editorOptions: {
                    // codemirror options
                    tabSize: 4,
                    mode: 'text/javascript',
                    theme: 'base16-dark',
                    lineNumbers: true,
                    line: true,
                    keyMap: "sublime",
                    // 按键映射，比如Ctrl键映射autocomplete，autocomplete是hint代码提示事件
                    extraKeys: { "Ctrl": "autocomplete" },
                    // 代码折叠
                    foldGutter: true,
                    gutters: ["CodeMirror-linenumbers", "CodeMirror-foldgutter"],
                    // 选中文本自动高亮，及高亮方式
                    styleSelectedText: true,
                    highlightSelectionMatches: { showToken: /\w/, annotateScrollbar: true },
                    // more codemirror options...
                    // 如果有hint方面的配置，也应该出现在这里
                }
            }
        },
        methods: {
            onEditorReady(editor) {

            },
            onEditorFocus(editor) {

            },
            onEditorCodeChange(newCode) {

            }
        },
        computed: {
            editor() {
                return this.$refs.codebox.editor
            }
        },
        mounted() {
            // console.log('this is current editor object', this.editor)
            // you can use this.editor to do something...
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