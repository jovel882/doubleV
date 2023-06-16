<template>
    <div>
        <div v-if="errors" class="alert alert-danger" role="alert">
            <i class="fa-sharp fa-solid fa-bug me-2"></i>
            <template v-if="typeof errors === 'string'">
                {{ errors }}
            </template>
            <template v-else>
                <span>Ocurrieron los siguientes errore:</span> 
                <ul>
                    <li v-for="error in errors" :key="error">{{ error }}</li>
                </ul>
            </template>
        </div>
        <div v-else class="alert alert-success" role="alert">Todo esta OK</div>
    </div>
</template>

<script>

export default {
    props: {
        errors: {
            required: true,
        },
    },
};

</script>
