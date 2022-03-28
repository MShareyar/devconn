<template>

    <div>
        <Header/>   
        <slot />
    </div>
</template>

<script>

import { Head } from '@inertiajs/inertia-vue';
import Header from '../front/Header.vue';

export default {
    components:{ Head , Header}
}
</script>