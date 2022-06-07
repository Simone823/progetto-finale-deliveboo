<template>
    <div>

    </div>
</template>

<script>
export default {
    data() {
            return {
                authUser: window.authUser,
                logo: require('/public/img/logo_white.svg')
            }
        },
        methods: {
            yourMethodName() {
                console.log(this.authUser);
            }
        },
        mounted() {
            this.yourMethodName();
        }
}
</script>

<style lang="scss" scoped>

</style>