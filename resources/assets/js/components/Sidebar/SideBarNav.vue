<template>
  <div id="sidebar-wrapper">
    <side-bar-nav-list>
      <side-bar-nav-topic :topic="selectedUnit.name" description="lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem "></side-bar-nav-topic>
      <!-- <side-bar-nav-sub-topic youtube-link="https://www.youtube.com/embed/jzh4zQcfB0o?autoplay=1" description="Description of Intro to Vue JS" topic="Intro to Vue JS"></side-bar-nav-sub-topic>
      <side-bar-nav-sub-topic youtube-link="https://www.youtube.com/embed/_9YMpuLDnwo?autoplay=1" description="Description of Intermediate Vue JS" topic="Intermediate Vue JS"></side-bar-nav-sub-topic>
      <side-bar-nav-sub-topic youtube-link="https://www.youtube.com/embed/FlsCjmMhFmw?autoplay=1" description="Description of Advanced VueJS" topic="Advanced VueJS"></side-bar-nav-sub-topic> -->
      <side-bar-nav-sub-topic v-for="subtopic in subtopics" :key="subtopic.id" :youtube-link="subtopic.youtube_link" :notes-pdf="subtopic.notes" :description="subtopic.description" :topic="subtopic.name"  @click.native="changeClicked(subtopic.name+subtopic.description)" :is-clicked="isClicked(subtopic.name+subtopic.description)"></side-bar-nav-sub-topic>
    </side-bar-nav-list>
    <side-bar-toggler></side-bar-toggler>
  </div>
</template>

<script>
import SideBarNavList from './SideBarNavList'
import SideBarNavSubTopic from './SideBarNavSubTopic'
import SideBarNavTopic from './SideBarNavTopic'
import SideBarToggler from './SideBarToggler'

export default {
  components:{
	  'side-bar-nav-list': SideBarNavList,
    'side-bar-nav-sub-topic': SideBarNavSubTopic,
    'side-bar-nav-topic': SideBarNavTopic,
    'side-bar-toggler': SideBarToggler
  },
  computed:{
    subtopics(){
      return this.$store.state.subtopics_in_selected_unit;
    },
    selectedUnit(){
      return this.$store.state.selected_unit;
    },
  },
  data () {
    return {
      title: 'Testing SideBarNav',
      active: '',
    }
  },
  methods:{
   changeClicked: function(subtopic){
     this.active = subtopic;
   },
   isClicked: function(subtopic){
     if(subtopic == this.active){
       return true;
     }
     else{
       return false;
     }
   }
  },
  mounted(){
    if(!this.selectedUnit.name || this.subtopics.length == 0){
      window.location.href = '/spa/SelectUnit';
    }  
  }
  
}
</script>

<style scoped>

.Clicked{
    background: #4180df;
}

#sidebar-wrapper{
  z-index: 1;
  position: fixed;
  width: 250px;
  height: 100%;
  overflow-x: hidden;
  overflow-y: scroll;
  /* background: rgb(44, 62, 80); */
  background: #292929;
  opacity: 0.9;
  transition: 0.7s;
  display: flex;
  flex-direction: column;
}

#wrapper.menuDisplayed #sidebar-wrapper{
    width: 250px;
}
#wrapper.menuNotDisplayed #sidebar-wrapper{
    width: 72px;
}
#wrapper.menuNotDisplayed.mobile-view #sidebar-wrapper{
	width: 0px;
}


.fa-custom{
    padding: 0 20px;
    vertical-align: middle;
}


</style>