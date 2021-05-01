<template lang="pug">
.sidebar
    stats
    filters(v-on='$listeners')
</template>

<script>
import Stats from '@components/stats';
import Filters from '@components/filters';

export default {
    name: 'Sidebar',
    components: { Stats, Filters },
};
</script>