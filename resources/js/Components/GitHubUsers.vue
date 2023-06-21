<template>
    <div>
        <div class="input-group mb-3">
            <input
                type="text"
                :class="
                    'form-control ' +
                    (username.length > 0
                        ? !isInputValid
                            ? 'is-invalid'
                            : 'is-valid'
                        : '')
                "
                v-model="username"
                placeholder="Ingrese el nombre de usuario"
                @input="validateInput"
                @keyup.enter="searchUser"
            />
            <button
                class="btn btn-primary"
                @click="searchUser"
                :disabled="isLoading || !isInputValid"
            >
                Buscar
            </button>
            <div class="invalid-feedback">
                Para buscar, el texto de búsqueda de usuarios debe ser de un
                mínimo de 4 caracteres y NO contenter la palabra
                “doublevpartners”.
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

        <div v-else-if="users.length > 0">
            <p id="tableDescribe">
                Primeros 10 Usuarios que coinciden con la busqueda:
                {{ username }}
            </p>
            <table class="table" aria-describedby="tableDescribe">
                <thead>
                    <tr>
                        <th>Nombre de usuario</th>
                        <th>ID</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="user in users" :key="user.id">
                        <td>{{ user.login }}</td>
                        <td>{{ user.id }}</td>
                        <td>
                            <a
                                v-if="user.score >= 0.5"
                                :href="routerDetailsUrl + '/' + user.login"
                                target="_blank"
                                ><i class="fa-solid fa-eye me-2"></i>Ver
                                detalle</a
                            >
                        </td>
                    </tr>
                </tbody>
            </table>

            <canvas v-if="errorChart.length == 0" ref="chart" class="my-5"></canvas>
            <div v-else>
                <ErrorAlert :errors="errorChart" />
            </div>            
        </div>
    </div>
</template>

<script>
import Chart from "chart.js/auto";
import ErrorAlert from "./ErrorAlert.vue";

export default {
    data() {
        return {
            username: "",
            users: [],
            isLoading: false,
            error: "",
            errorChart: [],
            isInputValid: false,
            routerDetailsUrl: routerDetails,
        };
    },
    components: {
        ErrorAlert,
    },
    methods: {
        validateInput() {
            const forbiddenText = "doublevpartners";
            this.isInputValid =
                this.username.length >= 4 &&
                !this.username.includes(forbiddenText);
        },
        searchUser() {
            if (!this.isInputValid) return;

            this.isLoading = true;
            this.error = "";
            this.errorChart = [];
            fetch(`https://api.github.com/search/users?q=${this.username}`)
                .then((response) => response.json())
                .then((data) => {
                    this.users = data.items.slice(0, 10);
                    if (this.users.length == 0) {
                        this.error = "No hay coincidencias con la busqueda.";
                    } else {                        
                        this.fetchFollowers();
                    }
                })
                .catch((error) => {
                    console.error(error);
                    this.error =
                        "Ocurrió un error al buscar y/o graficar usuarios de GitHub.";
                })
                .finally(() => {
                    this.isLoading = false;
                });
        },
        fetchFollowers() {
            const fetchFollowersPromises = this.users.map((user) => {
                return fetch(user.url)
                    .then((response) => {
                        if (response.ok)
                            return response.json();

                            throw new Error(response.status);
                    })
                    .then((data) => {
                        user.followers_count = data.followers;
                    })
                    .catch((error) => {
                        user.followers_count = 0;
                        this.errorChart.push(`No se pudieron obtener los seguidores del usuario: ${user.login}.`);
                        throw new Error(error);
                    });
            });

            Promise.all(fetchFollowersPromises).then(() => {
                this.createChart();
            }).catch((error) => {
                console.log(error);
            });
        },
        createChart() {
            const ctx = this.$refs.chart.getContext("2d");
            const labels = this.users.map((user) => user.login);
            const data = this.users.map((user) => user.followers_count);

            new Chart(ctx, {
                type: "bar",
                data: {
                    labels: labels,
                    datasets: [
                        {
                            label: "Número de seguidores",
                            data: data,
                            backgroundColor: "rgba(75, 192, 192, 0.2)",
                            borderColor: "rgba(75, 192, 192, 1)",
                            borderWidth: 1,
                        },
                    ],
                },
                options: {
                    responsive: true,
                    scales: {
                        y: {
                            beginAtZero: true,
                            title: {
                                display: true,
                                text: "Número de seguidores",
                            },
                        },
                        x: {
                            title: {
                                display: true,
                                text: "Nombre de usuario",
                            },
                        },
                    },
                },
            });
        },
    },
};
</script>

<style>
/* Estilos adicionales si es necesario */
</style>
