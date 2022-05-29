<template>
    <div>
        <h4 class="text-center">Edit Car</h4>
        <div class="row">
            <div class="col-md-6">
                <form @submit.prevent="updateCar">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" v-model="car.name">
                    </div>
                    <div class="form-group">
                        <label>Status</label>
                        <input type="text" class="form-control" v-model="car.status">
                    </div>
                    <div class="form-group">
                        <label>Driver</label>
                        <input type="text" class="form-control" v-model="car.driver">
                    </div>
                    <button type="submit" class="btn btn-primary">Update Car</button>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            car: {}
        }
    },
    created() {
        this.$axios.get('/sanctum/csrf-cookie').then(response => {
            this.$axios.get(`/api/cars/edit/${this.$route.params.id}`)
                .then(response => {
                    this.car = response.data;
                })
                .catch(function (error) {
                    console.error(error);
                });
        })
    },
    methods: {
        updateCar() {
            this.$axios.get('/sanctum/csrf-cookie').then(response => {
                this.$axios.post(`/api/cars/update/${this.$route.params.id}`, this.car)
                    .then(response => {
                        this.$router.push({name: 'cars'});
                    })
                    .catch(function (error) {
                        console.error(error);
                    });
            })
        }
    },
    beforeRouteEnter(to, from, next) {
        if (!window.Laravel.isLoggedin) {
            window.location.href = "/";
        }
        next();
    }
}
</script>