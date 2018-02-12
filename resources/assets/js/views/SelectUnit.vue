<template>
    <div>
        <div class="container-fluid">
            <div class="container">
                <h1 id="select-subject-heading">Select Unit in {{selected_subject.name}}</h1>
                <div v-for="n in last_row+1" :key="n.id" class="row">
                    <div v-for="i in 4" :key="i.id" v-if="((n-1)*4 + i) == ((last_row*4) + 1) && ((n-1)*4 + i) <= number_of_units" class="col-lg-3 outer" :style="'margin-left:'+percentage_offset+'%;'" id = "paddingSelector">
                        <div class="textBox" @click="updateSelectedSubject(units[(n-1)*4 + i - 1])">
                            <div class="inner">{{units[(n-1)*4 + i - 1].name}}</div>
                        </div>
                    </div>
                    <div v-else-if="((n-1)*4 + i) <= number_of_units" class="col-lg-3 outer">
                        <div class="textBox" @click="updateSelectedSubject(subjects[(n-1)*4 + i - 1])">
                            <div class="inner">{{units[(n-1)*4 + i - 1].name}}</div>
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
                number_of_units: -1,
                percentage_offset: 0.0,
                last_row: -1,
            }
        },
        mounted() {
            this.$store.dispatch('loadData').then(response => {
                var self = this;
                console.log(self.selected_semester)
                if(self.isEmpty(self.selected_subject)){
                    self.$router.push('SelectSubject');
                }
                self.updateNumberOfUnits();
                self.calculateRows();
                self.$nextTick(function() {
                    window.addEventListener('resize', self.getWindowWidth);
                });
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
            units(){
                return this.$store.state.units_in_selected_subject;
            },
            selected_subject(){
                return this.$store.state.selected_subject;
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
            updateNumberOfUnits: function(){
                this.number_of_units = this.units.length;
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
    line-height: 26.4px;
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


