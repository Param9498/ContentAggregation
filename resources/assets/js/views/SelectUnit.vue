<template>
    <div>
        <div class="container-fluid">
            <div class="container">
                <h1 id="select-unit-heading">Select Unit in {{selected_subject.name}}</h1>
                <div v-for="n in row_number+1" :key="n.id" class="row">
                    <div v-for="i in 4" :key="i.id" v-if="((n-1)*4 + i) == ((row_number*4) + 1) && ((n-1)*4 + i) <= number_of_units" class="col-lg-3 outer" :style="'margin-left:'+percentage_offset2+'%;'" id = "paddingSelector">
                        <div class="textBox" @click="updateSelectedSubject(units[(n-1)*4 + i - 1])">
                            {{units[(n-1)*4 + i - 1].name}}
                        </div>
                    </div>
                    <div v-else-if="((n-1)*4 + i) <= number_of_units" class="col-lg-3 outer">
                        <div class="textBox" @click="updateSelectedSubject(subjects[(n-1)*4 + i - 1])">
                            {{units[(n-1)*4 + i - 1].name}}
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
                if(self.isEmpty(self.selected_subject)){
                    self.$router.push('SelectSubject');
                }
                self.percentage_offset2 = self.percentage_offset;
                self.default_offset = self.percentage_offset;
                self.row_number = self.last_row;
                this.$nextTick(function() {
                    window.addEventListener('resize', self.getWindowWidth);
                    this.getWindowWidth()
                });
            });
        },
        beforeDestroy: function() {
            window.removeEventListener('resize', this.getWindowWidth);
        },
        computed:{
            units(){
                return this.$store.state.units_in_selected_subject;
            },
            selected_subject(){
                return this.$store.state.selected_subject;
            },
            number_of_units(){
                return this.units.length;
            },
            percentage_offset: {
                get:    function(){
                            var temp = this.number_of_units;
                            console.log("number-of-units : "+ temp);
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
                row_number = Math.floor(this.number_of_units/4);
                return row_number;
            },
        },
        methods:{
            getWindowWidth:function(event){
                console.log("change");
                var window_width = document.documentElement.clientWidth;
                if(window_width < 992){
                    this.percentage_offset = 0;
                }
                else{
                    this.percentage_offset = this.default_offset;
                }
            },
            calculateRows: function(){
                var row_number = -1;
                var temp = this.number_of_units;
                console.log("number-of-units : "+ temp);
                if(temp == 0){
                    this.$router.push('SelectSubject');
                }
                temp = temp % 4;
                this.percentage_offset = ((12 - (3*temp))/2)*8.333;
                row_number = Math.floor(this.number_of_units/4);
                this.last_row = row_number;
            },
            
            isEmpty: function(obj) {
                for(var key in obj) {
                    if(obj.hasOwnProperty(key))
                        return false;
                }
                return true;
            }
        },
        watch: {
            number_of_units: function (val) {
                alert("yes, computed property changed");
                this.percentage_offset2 = this.percentage_offset;
                this.row_number = this.last_row;
            }
        },
    }
</script>

<style scoped>
#select-unit-heading{
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


</style>


