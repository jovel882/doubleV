<template>
    <div v-if="user">
        <div class="card text-center">
            <div class="row g-0">
                <div class="col-md-4">
                    <img
                        :src="user.avatar_url"
                        class="img-fluid rounded-start"
                        alt="..."
                    />
                </div>
                <div class="col-md-8 px-3 align-self-center">
                    <div class="card-body">
                        <h5 class="card-title text-center text-md-start">{{ user.login }}</h5>
                        <p class="card-text text-center text-md-start"><span class="fw-bold">ID:</span> {{ user.id }}</p>
                        <p class="card-text text-center text-md-start"><span class="fw-bold">Nombre:</span> {{ user.name }}</p>
                        <p class="card-text text-center text-md-start"><span class="fw-bold">Bio:</span> {{ user.bio }}</p>
                        <p class="card-text text-center text-md-start"><span class="fw-bold">Repositorios Publicos:</span> {{ user.public_repos }}</p>
                        <p class="card-text text-center text-md-start"><span class="fw-bold">Followers:</span> {{ user.followers }}</p>
                        <p class="card-text text-center text-md-start"><span class="fw-bold">Following:</span> {{ user.following }}</p>
                        <p class="card-text text-center text-md-start"><span class="fw-bold">Blog:</span> <a :href="user.blog" target="_blank" >{{ user.blog }}</a></p>
                        <a
                            :href="user.html_url"
                            class="btn btn-primary text-center text-md-start"
                            target="_blank"
                            >Ver perfil</a
                        >
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div v-if="isLoading" class="text-center">
        <div class="spinner-border" role="status">
            <span class="visually-hidden">Cargando...</span>
        </div>
    </div>

    <div v-else-if="error">
        <ErrorAlert :errors="error" />
    </div>
</template>

<script>
import ErrorAlert from "./ErrorAlert.vue";

export default {
    data() {
        return {
            username: loginUser,
            user: false,
            isLoading: false,
            error: "",
        };
    },
    components: {
        ErrorAlert,
    },
    mounted() {
        this.fetchUserData();
    },
    methods: {
        fetchUserData() {
            this.isLoading = true;
            this.error = "";
            fetch(`https://api.github.com/users/${this.username}`)
                .then((response) => response.json())
                .then((data) => {
                    this.user = data;
                    if (!this.user["id"]) {
                        this.user = false;
                        this.error = data.message + ' <-> ' + this.username;
                    }
                })
                .catch((error) => {
                    console.error(error);
                    this.error =
                        "Ocurrió un error al buscar el usuario de GitHub.";
                })
                .finally(() => {
                    this.isLoading = false;
                });
        },
    },
};
</script>

<style>
/* Estilos adicionales si es necesario */
</style>
