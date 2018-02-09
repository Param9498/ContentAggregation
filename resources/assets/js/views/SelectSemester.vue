<template>
    <div>
        
        <div class="container-fluid">
            <div class="container">
                <h1>Select Semester</h1>
                <div v-for="n in last_row+1" :key="n.id" class="row">
                    <div v-for="i in 4" :key="i.id" v-if="((n-1)*4 + i) == ((last_row*4) + 1) && ((n-1)*4 + i) <= number_of_semester" class="col-lg-3 flexbox" :style="'margin-left:'+percentage_offset+'%;'">
                        <div class="imageBox">
                            <img class="img-fluid" :src="'/images/semester '+((n-1)*4 + i)+'.png'" alt="Card image cap">
                        </div>
                    </div>
                    <div v-else-if="((n-1)*4 + i) <= number_of_semester" class="col-lg-3 flexbox">
                        <div class="imageBox">
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
                branch: [],
                number_of_semester: 0,
                column: [],
                last_row: 0,
                percentage_offset: 0.0
            }
        },
        created() {
            var self = this;
            axios.get('/api/user/profile').then(response => {
                var profile = response.data.data;
                self.number_of_semester = profile.degree.number_of_semesters;
                console.log(self.number_of_semester);
                self.branch = profile.branch;
                return axios.get('/api/branches/'+self.branch.id);
            }).then(response => {
                console.log(response.data.data);
                return self.calculateRows();
            });
        },
        methods:{
            calculateRows: function(){
            var row_number = 0;
            var temp = this.number_of_semester;
            console.log(this.number_of_semester);
            console.log(temp);
            temp = temp % 4;
            this.percentage_offset = ((12 - (3*temp))/2)*8.333;
            row_number = Math.floor(this.number_of_semester/4);
            this.last_row = row_number;
            console.log("Last Row : " + this.last_row);
            console.log("Offset : "+this.percentage_offset);
            }
        },
        mounted(){
        }
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

