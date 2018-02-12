<template>
    <div>
        
        <div class="container-fluid">
            <div v-if="number_of_semester" class="container">
                <h1>Select Semester</h1>
                <div v-for="n in last_row+1" :key="n.id" class="row">
                    <div v-for="i in 4" :key="i.id" v-if="((n-1)*4 + i) == ((last_row*4) + 1) && ((n-1)*4 + i) <= number_of_semester" class="col-lg-3 flexbox" :style="'margin-left:'+percentage_offset2+'%;'" id = "paddingSelector">
                        <div class="imageBox" @click="testFunction((n-1)*4 + i)">
                            <img class="img-fluid" :src="'/images/semester '+((n-1)*4 + i)+'.png'" alt="Card image cap">
                        </div>
                    </div>
                    <div v-else-if="((n-1)*4 + i) <= number_of_semester" class="col-lg-3 flexbox">
                        <div class="imageBox" @click="testFunction((n-1)*4 + i)">
                            <img class="img-fluid" :src="'/images/semester '+((n-1)*4 + i)+'.png'" alt="Card image cap">
                        </div>
                    </div>         
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data: function(){
            return{
                percentage_offset2: 0.0,
                default_offset: 0.0
            }
        },
        mounted(){
            this.$store.dispatch('loadData').then(response => {
                var self = this;
                self.$nextTick(function() {
                    window.addEventListener('resize', self.getWindowWidth);
                    self.getWindowWidth()
                });
                self.percentage_offset2 = self.percentage_offset;
                self.default_offset = self.percentage_offset;
            });
            setTimeout(function(){
                var window_width = document.documentElement.clientWidth;
                if(window_width < 992){
                    this.percentage_offset = 0;
                }
                else{
                    this.percentage_offset = this.default_offset;
                }
            }, 400);
        },
        beforeDestroy: function() {
            window.removeEventListener('resize', this.getWindowWidth);
        },
        methods:{
            getWindowWidth:function(event){
                var window_width = document.documentElement.clientWidth;
                if(window_width < 992){
                    this.percentage_offset = 0;
                }
                else{
                    this.percentage_offset = this.default_offset;
                }
            },
            testFunction: function(sem){
                this.$store.commit('updateSelectedSemester', sem);
                this.$router.push('/spa/SelectSubject');
            }
        },
        computed: {
            number_of_semester(){
                return this.$store.state.number_of_semester;
            },
            percentage_offset: {
                get:    function(){
                            var temp = this.number_of_semester;
                            if(temp == 0){
                                this.$router.push('Welcome');
                            }
                            console.log("number-of-sem : "+ temp);
                            temp = temp % 4;
                            return ((12 - (3*temp))/2)*8.333;
                        },
                set:    function (newValue) {
                            this.percentage_offset2 = newValue;
                        }
            },
            last_row(){
                var row_number = -1;
                row_number = Math.floor(this.number_of_semester/4);
                return row_number;
            }
        },
    }
</script>

<style scoped>
    .imageBox{
        position: relative;
        margin: 40px auto;
        border-radius: 40px;
        overflow-x: hidden;
        max-width: 300px;
        widows: 100%;
        cursor: pointer;
        /* transition: 3s; */
    }
    .imageBox:hover img{
        transform: scale(1.5);
    }
    /* .imageBox:hover{
        border-radius: 150px;
    } */
    .imageBox img{
        transition: 0.3s;
    }
    .container h1{
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
    .flexbox {
        display:flex;
        justify-content:center;
        align-items: center;
        flex-flow: column;
    }
    
</style>

