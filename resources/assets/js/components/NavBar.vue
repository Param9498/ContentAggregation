<template>
    <nav class="navbar navbar-dark navbar-expand-lg">
        <a class="navbar-brand" href="#">Crack Engineering</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <!-- <a class="nav-link" href="/spa/home">Home <span class="sr-only">(current)</span></a> -->
                    <router-link :to="{ name: 'App' }" exact><a class="nav-link" href="#">Home</a></router-link>
                </li>
                <li class="nav-item" >
                    <router-link :to="{ name: 'SelectSemester' }" ><a class="nav-link" href="#">Select Semester</a></router-link>
                </li>
            </ul>
            <ul class="navbar-nav">
                <li class="nav-item">
                <a class="nav-link" href="/logout">Logout</a>
                </li>
            </ul>
        </div>
    </nav>
</template>

<script>
    export default{

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
    .router-link-active a{
        background-color: rgb(49, 32, 44);
    }
</style>
