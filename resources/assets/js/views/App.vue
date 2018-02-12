<template>
    <div>
        <nav-bar></nav-bar>
        <transition name="fade">
            <router-view></router-view>
        </transition>
    </div>
</template>
<script>
    import NavBar from '../components/NavBar'
    import Welcome from './Welcome'
    export default {
        components:{
            'nav-bar': NavBar,
            'welcome': Welcome
        }
    }
</script>

<style scoped>

#welcome{
    position: relative;
    margin-top: 40px;
    text-align: center;
    font-family: "Amatic SC";
    font-size: 55px;
    font-style: normal;
    font-variant: small-caps;
    font-weight: 1000;
    line-height: 26.4px;
}
.fade-enter-active, .fade-leave-active {
  transition-property: opacity;
  transition-duration: .25s;
}

.fade-enter-active {
  transition-delay: .25s;
}

.fade-enter, .fade-leave-active {
  opacity: 0
}


</style>


