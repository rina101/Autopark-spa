<template>
    <div>
        <h4 class="text-center">All cars</h4><br/>
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Status</th>
                <th>Created At</th>
                <th>Updated At</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="car in cars" :key="car.id">
                <td>{{ car.id }}</td>
                <td>{{ car.name }}</td>
                <td>{{ car.author }}</td>
                <td>{{ car.created_at }}</td>
                <td>{{ car.updated_at }}</td>
                <td>
                    <div class="btn-group" role="group">
                        <router-link :to="{name: 'editcar', params: { id: car.id }}" class="btn btn-primary">Edit
                        </router-link>
                        <button class="btn btn-danger" @click="deleteCar(car.id)">Delete</button>
                    </div>
                </td>
            </tr>
            </tbody>
        </table>

        <button type="button" class="btn btn-info" @click="this.$router.push('/cars/add')">Add Car</button>
    </div>
</template>

<script>
export default {
    data() {
        return {
            cars: []
        }
    },
    mounted() {
        this.$axios.get('/sanctum/csrf-cookie').then(response => {
            this.$axios.get('/api/cars')
                .then(response => {
                    this.cars = response.data;
                })
                .catch(function (error) {
                    console.error(error);
                });
        })
    },
    methods: {
        deleteCar(id) {
            this.$axios.get('/sanctum/csrf-cookie').then(response => {
                this.$axios.delete(`/api/cars/delete/${id}`)
                    .then(response => {
                        let i = this.cars.map(item => item.id).indexOf(id);
                        this.cars.splice(i, 1)
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