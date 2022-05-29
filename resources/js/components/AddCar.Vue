<template>
    <div>
        <h4 class="text-center">Add Car</h4>
        <div class="row">
            <div class="col-md-6">
                <form @submit.prevent="addСar">
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
                    <button type="submit" class="btn btn-primary">Add Car</button>
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
    methods: {
        addCar() {
            this.$axios.get('/sanctum/csrf-cookie').then(response => {
                this.$axios.post('/api/cars/add', this.car)
                    .then(response => {
                        this.$router.push({name: 'cars'})
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