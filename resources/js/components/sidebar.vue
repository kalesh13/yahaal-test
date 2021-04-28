<template lang="pug">
.sidebar
    stats
    slot
</template>

<script>
import Stats from '@components/stats';

export default {
    name: 'Sidebar',
    components: { Stats },
};
</script>