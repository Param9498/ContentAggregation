<template>
  <div id="page-content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1>{{heading}}</h1>
                    <div class="embed-responsive embed-responsive-16by9" id="video">
                        <div class="embed-responsive-item">
                            <iframe :src="youtubeLink" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                        </div>
                    </div>
                    <br><br><br>
                    <p>{{description}}</p>
                </div>
            </div>
        </div>
        
    </div>
</template>

<script>
import { bus } from '../../app'
export default {
  data () {
    return {
      title: 'Testing Page Content',
      youtubeLink: '',
      heading: '',
      description: '',
    }
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