<template>
    <nav class="navbar navbar-dark navbar-expand-lg">
        <!-- <a class="navbar-brand" href="#">Crack Engineering</a> -->
        <router-link :to="{ name: 'Welcome' }" exact><a class="navbar-brand" href="#">Crack Engineering</a></router-link>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <!-- <li class="nav-item">
                    <router-link :to="{ name: 'Welcome' }" exact><a class="nav-link" href="#">Welcome Page</a></router-link>
                </li> -->
                <li class="nav-item" >
                    <router-link :to="{ name: 'SelectSemester' }" ><a class="nav-link" href="#">Select Semester</a></router-link>
                </li>
                <li class="nav-item" >
                    <router-link :to="{ name: 'SelectSubject' }" ><a class="nav-link" href="#">Select Subject</a></router-link>
                </li>
                <li class="nav-item" >
                    <router-link :to="{ name: 'SelectUnit' }" ><a class="nav-link" href="#">Select Unit</a></router-link>
                </li>
            </ul>
            <ul class="navbar-nav">
                <li class="nav-item">
                <a class="nav-link" @click.prevent="logout()" href="/logout">Logout</a>
                </li>
            </ul>
        </div>
    </nav>
</template>

<script>
    export default{
        methods:{
            logout: function(){
                console.log("Logging out!");
                //this.$store.commit('clearStateData');
                window.location.href = '/logout';
            }
        }
    }
</script>

<style scoped>
    .navbar{
        background-color:#64445A;
    }
    a{
        color: #FFFFFF; 
        text-decoration: none;
    }
    .nav-item:hover{
        background-color: rgb(49, 32, 44);
    }
    .router-link-active a.nav-link{
        background-color: rgb(49, 32, 44);
    }
</style>
