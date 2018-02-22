<template>
    <li class="subtopic" :class="{Clicked: isClicked}">
        <a href="#" @click.prevent="changeLessonView(topic)" id = "subtopic-link">
            <div style="font-size:1em;" id="left">
                <i class="fas fa-circle fa-custom fa-xs"></i>
                <!-- <i class="fas fa-angle-right fa-custom"></i> -->
            </div>
            <div class="sidebar-nav-item" id="right">{{topic}}</div>
        </a>
    </li>
</template>

<script>
import { bus } from '../../app'
export default {
    props:[
        'youtubeLink',
        'topic',
        'description',
        'isClicked'
    ],
  data () {
    return {
    }
  },
  methods:{
      changeLessonView:function(topic){
          bus.$emit('videoChange', this.youtubeLink);
          bus.$emit('topicChange', this.topic);
          bus.$emit('descriptionChange', this.description);
          console.log(this.isClicked);
      },
  },
}
</script>

<style scoped>

.subtopic{
    overflow: auto;
    position: relative;
}

.Clicked{
    background: #4180df;
}

#left  {
    width: 20%;
    float:left;  
    padding: 3px;
}
#right { 
    width: 80%;
    float:right;
} 

.subtopic{
    text-decoration: none;
    color: #ddd;
}

.subtopic a:focus{
    background: rgb(22, 39, 56);
}

a{
    color: white;
}

.subtopic:hover{
    background: #4CAF50;
}

.fa-custom{
    padding: 0 20px;
    vertical-align: middle;
}
</style>
