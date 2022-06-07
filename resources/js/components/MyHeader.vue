<template>
    <div>
        <nav id="navbar_guest" class="navbar navbar-expand-lg navbar-light">
        <div class="container-md">
            <!-- LOGO  -->
            <a class="ms-3 ms-md-0 navbar-brand" href="/">
                <img id="header_logo_deliveboo" :src="logo" alt="Deliveboo">
            </a>

            
                    
            </div>
    </nav>

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