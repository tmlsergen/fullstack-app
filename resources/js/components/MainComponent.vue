<template>
    <div>
        <HeaderComponent></HeaderComponent>
        <div>
            Content Here
        </div>
        <FooterComponent></FooterComponent>
    </div>
</template>
<script>
import HeaderComponent from "./HeaderComponent";

export default {
    components: {
        HeaderComponent,
    },
}
</script>

<style>
main > .container {
    padding: 60px 15px 0;
}
</style>
