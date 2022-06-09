<template>
    <div>
        <MyHeader/>
        <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div id="dropin-container"></div>
                <button id="submit-button">Request payment method</button>
            </div>
        </div>
    </div>
    </div>
</template>

<script>
import MyHeader from '../components/MyHeader.vue';
    export default {
        components: {
            MyHeader,
        }
    }
</script>

<style lang="scss" scoped>

</style>