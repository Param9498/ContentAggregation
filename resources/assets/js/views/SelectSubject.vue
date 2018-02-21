<template>
    <div>
        <div class="container-fluid">
            <div class="container">
                <h1 id="select-subject-heading">Select Subject</h1>
                <div v-for="n in row_number+1" :key="n.id" class="row">
                    <div v-for="i in 4" :key="i.id" v-if="((n-1)*4 + i) == ((row_number*4) + 1) && ((n-1)*4 + i) <= number_of_subjects" class="col-lg-3 flexbox" :style="'margin-left:'+percentage_offset2+'%;'" id = "paddingSelector">
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
                percentage_offset2: 0.0,
                default_offset: 0.0,
                row_number: -1
            }
        },
        mounted() {
            this.$store.dispatch('loadData').then(response => {
                var self = this;
                console.log(self.selected_semester)
                if(self.selected_semester == -1){
                    this.$router.push('SelectSemester');
                }
                self.percentage_offset2 = self.percentage_offset;
                self.default_offset = self.percentage_offset;
                self.row_number = self.last_row;
                this.$nextTick(function() {
                    window.addEventListener('resize', this.getWindowWidth);
                    this.getWindowWidth();
                });
            });
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
            },
            percentage_offset: {
                get:    function(){
                            var temp = this.number_of_subjects;
                            console.log("number-of-subs : "+ temp);
                            temp = temp % 4;
                            //this.percentage_offset2 = ((12 - (3*temp))/2)*8.333;
                            return ((12 - (3*temp))/2)*8.333;
                        },
                set:    function (newValue) {
                            this.percentage_offset2 = newValue;
                        }
            },
            last_row(){
                var row_number = -1;
                row_number = Math.floor(this.number_of_subjects/4);
                return row_number;
            },
            number_of_subjects(){
                return this.subjects.length;
            },
            subjects(){
                var subs = this.list_of_subjects;
                var subs2 = [];
                subs.forEach(subject => {
                    if(subject.semester_number == this.selected_semester){
                        subs2.push(subject);
                    }
                });
                return subs2;
            }
        },
        watch: {
            number_of_subjects: function (val) {
                alert("yes, computed property changed");
                this.percentage_offset2 = this.percentage_offset;
                this.row_number = this.last_row;
            }
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


