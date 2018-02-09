<template>
    <div>
        <h1 id="welcome">Welcome to Crack Engineering</h1>
    </div>
</template>
<script>
    import SelectSemester from './SelectSemester.vue'
    export default {
        components:{
            'select-semester': SelectSemester
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



</style>


