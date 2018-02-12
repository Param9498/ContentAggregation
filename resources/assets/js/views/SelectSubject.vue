<template>
    <div>
        <div class="container-fluid">
            <div class="container">
                <h1 id="select-subject-heading">Select Subject</h1>
                <div v-for="n in last_row+1" :key="n.id" class="row">
                    <div v-for="i in 4" :key="i.id" v-if="((n-1)*4 + i) == ((last_row*4) + 1) && ((n-1)*4 + i) <= number_of_subjects" class="col-lg-3 flexbox" :style="'margin-left:'+percentage_offset+'%;'" id = "paddingSelector">
                        <div class="textBox" @click="updateSelectedSubject(subjects[(n-1)*4 + i - 1])">
                            {{subjects[(n-1)*4 + i - 1].name}}
                        </div>
                    </div>
                    <div v-else-if="((n-1)*4 + i) <= number_of_subjects" class="col-lg-3 flexbox">
                        <div class="textBox" @click="updateSelectedSubject(subjects[(n-1)*4 + i - 1])">
                            {{subjects[(n-1)*4 + i - 1].name}}
                        </div>
                    </div>         
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default{
        data: function(){
            return {
                subjects: [],
                number_of_subjects: 0,
                percentage_offset: 0.0,
                last_row: -1,
            }
        },
        mounted() {
            this.$store.dispatch('loadData').then(response => {
                var self = this;
                console.log(self.selected_semester)
                if(self.selected_semester == -1){
                    this.$router.push('SelectSemester');
                }
                self.findSubjects();
                self.calculateRows();
                
            });
            this.$nextTick(function() {
                window.addEventListener('resize', this.getWindowWidth);
                
            });
            setTimeout(function(){
                var window_width = document.documentElement.clientWidth;
                if(window_width < 992){
                    var element = document.getElementById("paddingSelector");
                    //alert(window_width);
                    if(element != null){
                        element.classList.add("togglePadding");
                    }
                }
                else{
                    //alert("window width" + window_width);
                    var element = document.getElementById("paddingSelector");
                    if(element != null && element.classList.contains("togglePadding")){
                        element.classList.remove("togglePadding");
                    }
                }
            }, 400);
        },
        beforeDestroy: function() {
            window.removeEventListener('resize', this.getWindowWidth);
        },
        computed:{
            list_of_subjects(){
                return this.$store.state.subjects;
            },
            selected_semester(){
                return this.$store.state.selected_semester;
            }
        },
        methods:{
            getWindowWidth:function(event){
                var window_width = document.documentElement.clientWidth;
                if(window_width < 992){
                    var element = document.getElementById("paddingSelector");
                        //alert(window_width);
                        if(element != null){
                            element.classList.add("togglePadding");
                        }
                    }
                    else{
                        //alert("window width" + window_width);
                        var element = document.getElementById("paddingSelector");
                        if(element != null && element.classList.contains("togglePadding")){
                            element.classList.remove("togglePadding");
                        }
                    }
            },
            findSubjects: function(){
                var subs = this.list_of_subjects;
                subs.forEach(subject => {
                    if(subject.semester_number == this.selected_semester){
                        this.subjects.push(subject);
                    }
                });
                this.number_of_subjects = this.subjects.length;
            },
            calculateRows: function(){
                var row_number = -1;
                var temp = this.number_of_subjects;
                console.log("number-of-subjects : "+ temp);
                temp = temp % 4;
                this.percentage_offset = ((12 - (3*temp))/2)*8.333;
                row_number = Math.floor(this.number_of_subjects/4);
                this.last_row = row_number;
            },
            updateSelectedSubject: function(subject){
                this.$store.commit("updateSelectedSubject", subject);
                this.$router.push('SelectUnit');
            }
        }
    }
</script>

<style scoped>
#select-subject-heading{
    position: relative;
    margin: 40px auto;
    text-align: center;
    font-family: "Amatic SC";
    font-size: 55px;
    font-style: normal;
    font-variant: small-caps;
    font-weight: 1000;
    line-height: 55px;
}
.togglePadding{
    margin-left: auto !important;
    margin-right: auto !important;
}
.textBox{
    position: relative;
    overflow-x: hidden;
    margin-top: 40px;
    margin-left: auto;
    margin-right: auto;
    max-width: 300px;
    cursor: pointer;
    text-align: center;
    min-height: 200px;
    display:flex;
    justify-content: center;
    align-items: center;
    background-color: #64445A;
    color: white;
    border-radius: 90px;
    font-family: "Amatic SC";
    font-size: 30px;
    font-style: normal;
    font-variant: small-caps;
    font-weight: 1000;
    transition: 0.2s;
}
.textBox:hover{
    font-size: 40px;
}
@media screen and (max-width: 992px) {
    /* For mobile phones: */
    [class*="col-"] {
        margin-left: 0px;
    }
}
</style>


