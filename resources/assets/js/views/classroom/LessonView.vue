<template>
  <div id="page-content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <ul class="nav nav-tabs nav-fill" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="video-tab" data-toggle="tab" href="#video" role="tab" aria-controls="video" aria-selected="true">Video</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="notes-tab" data-toggle="tab" href="#notes" role="tab" aria-controls="notes" aria-selected="false">Notes</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="video" role="tabpanel" aria-labelledby="video-tab">
                            <h1>{{heading}}</h1>
                            <div class="embed-responsive embed-responsive-16by9" id="video">
                                <div class="embed-responsive-item">
                                    <iframe :src="youtubeLink" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                                </div>
                            </div>
                            <br><br><br>
                            <p>{{description}}</p>
                        </div>
                        <div class="tab-pane fade" id="notes" role="tabpanel" aria-labelledby="notes-tab">
                            <template-editor></template-editor>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
</template>

<script>
import { bus } from '../../app'
//import { PDFJS } from 'pdfjs-dist'
import TemplateEditor from './TemplateEditor'
export default {
  data () {
    return {
      title: 'Testing Page Content',
      youtubeLink: '',
      heading: '',
      description: '',
    }
  },
  components:{
      'template-editor': TemplateEditor
  },
  created(){
      bus.$on('videoChange',(data)=>{
          this.youtubeLink = data;
      });
      bus.$on('topicChange',(data)=>{
          this.heading = data;
      });
      bus.$on('descriptionChange',(data)=>{
          this.description = data;
      });
  },
  
}
</script>

<style scoped>


#wrapper.menuDisplayed #page-content-wrapper{
    padding-left: 250px;
    transition: 0.7s;
}

#wrapper.menuNotDisplayed #page-content-wrapper{
    padding-left: 72px;
    transition: 0.7s;
}
#wrapper.menuNotDisplayed.tablet-view #page-content-wrapper{
    padding-left: 72px;
    transition: 0.7s;
}
#wrapper.menuDisplayed.tablet-view #page-content-wrapper{
    padding-left: 72px;
    transition: 0.7s;
}
#wrapper.menuNotDisplayed.mobile-view #page-content-wrapper{
    padding-left: 0px;
    transition: 0.7s;
}
#wrapper.menuDisplayed.mobile-view #page-content-wrapper{
    padding-left: 0px;
    transition: 0.7s;
}
</style>