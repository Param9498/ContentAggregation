<template>
    <div id="wrapper" class="menuDisplayed">
        <!-- {{ $route.params.lesson_number }} -->
        <side-bar-nav></side-bar-nav>
        <transition name="fade">
            <lesson-view></lesson-view>
        </transition>
    </div>
</template>
<script>
    import SideBarNav from '../../components/Sidebar/SideBarNav'
    import LessonView from './LessonView'
    export default {
        components:{
            'side-bar-nav': SideBarNav,
            'lesson-view': LessonView
        }
    }
</script>

<style scoped>
.fade-enter-active, .fade-leave-active {
  transition-property: opacity;
  transition-duration: 2s;
}

.fade-enter-active {
  transition-delay: 2s;
}

.fade-enter, .fade-leave-active {
  opacity: 0
}
</style>