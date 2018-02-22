<template>
  <ul class="sidebar-nav">
    <slot></slot>
  </ul>
</template>

<script>
import SideBarNavSubTopic from './SideBarNavSubTopic'
import SideBarNavTopic from './SideBarNavTopic'
export default {
  components:{
    'side-bar-nav-sub-topic': SideBarNavSubTopic,
    'side-bar-nav-topic': SideBarNavTopic
  },
  data () {
    return {
      
    }
  }
}
</script>

<style scoped>
  .sidebar-nav{
    padding: 0;
    list-style: none;
    flex: 1;
    overflow: auto;
    position: relative;
    bottom: 0;
    margin-bottom: 0;
}

.sidebar-nav li{
    line-height: 50px;
    vertical-align: middle;
    border-bottom: 1px solid #4CAF50; 
}

.sidebar-nav li a{
    display: block;
    text-decoration: none;
    color: #ddd;
}

.sidebar-nav li a:hover{
    background: #16A085;
}
</style>
