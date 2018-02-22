<template>
    <ul class="sidebar-nav-toggler">
        <li id="sidebar-last-item" @click = "toggleMenu">
            <a href="#" id="menu-toggle">
            <span style="font-size:2em;">
                <i class="fas fa-arrows-alt-h fa-custom"></i>
            </span>
            </a>
        </li>
        <div style="height:40px" id="mobile-menu-icon"><i class="fas fa-bars fa-2x" @click = "toggleMenu"></i></div>
    </ul>
</template>

<script>
export default {
  data () {
    return {
      
    }
  },
  methods:{
  toggleMenu:function(){
      var element = document.getElementById("wrapper");
      element.classList.toggle("menuNotDisplayed");
      element.classList.toggle("menuDisplayed");
      if(element.classList.contains("menuNotDisplayed")){
        var sidebarText = document.getElementsByClassName("sidebar-nav-item");
        for(var i = 0; i < sidebarText.length; i++){
          sidebarText[i].style.display = "none";
        }
      }
      else{
        var sidebarText = document.getElementsByClassName("sidebar-nav-item");
        setTimeout(function(){
          for(var i = 0; i < sidebarText.length; i++){
                sidebarText[i].style.display = "inline";
		  }
		  
        }, 200);
      }
    },
    getWindowWidth:function(){
      var windowWidth = document.documentElement.clientWidth;
      var element = document.getElementById("wrapper");
      if(windowWidth <= 768 && windowWidth >440){
		element.classList.remove("mobile-view");
        if(!element.classList.contains("tablet-view")){
          element.classList.toggle("tablet-view");
          if(element.classList.contains("menuDisplayed")){
            this.toggleMenu();
          }
        }
	  }
	  else if(windowWidth <= 440){
		  element.classList.remove("tablet-view");
		  if(!element.classList.contains("mobile-view")){
			element.classList.toggle("mobile-view");
			if(element.classList.contains("menuDisplayed")){
				this.toggleMenu();
			}
        }
	  }
      else{
		element.classList.remove("tablet-view");
		element.classList.remove("mobile-view");
        if(element.classList.contains("menuNotDisplayed")){
            this.toggleMenu();
          }
      }
    }
  },
  mounted: function(){
    this.$nextTick(function() {
      window.addEventListener('resize', this.getWindowWidth);
      this.getWindowWidth()
    })
  },
  beforeDestroy: function() {
    window.removeEventListener('resize', this.getWindowWidth);
  }
}
</script>

<style scoped>
#sidebar-last-item{
    text-align: center;
    position: relative;
    background: #292929;
    opacity: 1;
    bottom: 0;
    left:0;
    transition: 0.7s;
    padding: 0px;
}

#wrapper.menuNotDisplayed #sidebar-last-item{
    width: 72px;  
}
#wrapper.menuDisplayed #sidebar-last-item{
    width: 250px;  
}
#wrapper.menuNotDisplayed.mobile-view #sidebar-last-item{
	width: 0px;
	visibility: hidden;
}
#wrapper.menuDisplayed.mobile-view #sidebar-last-item{
	visibility: visible;
	width: 250px;
	transition: 0.7s;
}
#mobile-menu-icon{
	display:none;
}
#wrapper.mobile-view.menuNotDisplayed #mobile-menu-icon{
	display: block;
    color:black;
    margin:15px;
    background-color:#16A085;
    border-radius:100%;
    padding:6px;
    position: fixed;
    float: left;
    opacity: 1;
	bottom: 0px;
}
.sidebar-nav-toggler{
    padding-left: 0px;
    margin-top: 0px;
    margin-bottom: 0px;
}
.sidebar-nav-toggler li{
    line-height: 80px;
    vertical-align: middle;
    border-bottom: 1px solid #16A085; 
}
.sidebar-nav-toggler li a{
    display: block;
    text-decoration: none;
    color: #ddd;
}
.sidebar-nav-toggler li a:hover{
    background: #4CAF50;
}
</style>
