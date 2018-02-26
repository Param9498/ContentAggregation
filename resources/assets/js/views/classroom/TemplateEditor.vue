<template>
    <div id="example1">
        <iframe :src="notesPdf" width="100%" height="750"></iframe>
    </div>
</template>


<script>
import PDFObject from 'pdfobject'
import { bus } from '../../app'
export default{
    data(){
        return{
            notesPdf: ''
        }
    },
    mounted(){
        //console.log("PDF LINK: "+this.notesPdf)
        
    },
    created(){
        bus.$on('notesChange',(data)=>{
            this.notesPdf = "https://docs.google.com/viewer?url=https://github.com/Param9498/pdfs/raw/master/"+data+"&embedded=true";
            console.log("IN LESSON VIEW "+this.notesPdf);
            //PDFObject.embed("https://docs.google.com/viewer?url=https://github.com/Param9498/pdfs/raw/master/test.pdf", "#example1");
        });
    }
}

</script>

<style>
.pdfobject-container { height: 700px;}
.pdfobject { border: 1px solid #666; }
</style>