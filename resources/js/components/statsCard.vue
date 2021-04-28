<template lang="pug">
.stats-card
    .value(v-text='count')
    .label
        strong(v-text='label')
</template>

<script>
export default {
    name: 'StatsCard',
    props: ['icon', 'label', 'count', 'loading'],
};
</script>