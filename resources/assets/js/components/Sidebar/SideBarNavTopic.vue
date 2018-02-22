<template>
    <div class="topic">
        <li style="background-color:#5c6bc0;" class="disabled" @click="changeLessonView($event)">
            <div style="font-size:2em;" id = "left">
                    <a href="/spa/SelectUnit" id = "go-back"><i class="fas fa-angle-left fa-custom"></i></a>
            </div>
            <a href="#" id="topic">
                
                <div class="sidebar-nav-item" id = "right">{{topic}}</div>
            </a>
        </li>
    </div>
</template>

<script>
import { bus } from '../../app'
export default {
  props: ['topic', 'description'],
  data () {
    return {
    }
  },
  methods:{
      changeLessonView:function(event){
          bus.$emit('videoChange', '');
          bus.$emit('topicChange', this.topic);
          bus.$emit('descriptionChange', this.description);
      }
  }
}
</script>

<style scoped>


.sidebar-nav li a{
    display: block;
    text-decoration: none;
    color: #ddd;
}

.sidebar-nav li a #topic:hover{
    background: #4CAF50;
}

.sidebar-nav li a #go-back:hover{
    background: #222222;
}

.topic{
    overflow: auto;
}

#left  {
    width: 30%;
    float:left;  
    padding-left: 10px;
    align-items: center;
}
#right { 
    width: 70%;
    float:right; 
} 

a{
    color: white;
}
.topic{
   background-color: #F44336; 
   margin-top: 20px;
   margin-bottom: 20px;
}
.fa-custom{
    padding: 0 20px;
    vertical-align: middle;
}
</style>
