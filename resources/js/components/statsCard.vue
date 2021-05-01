<template lang="pug">
.stats-card
    .value
        span.fas.fa-circle-notch.fa-spin(v-if='loading')
        template(v-else) {{ count }}
    .label
        strong(v-text='label')
</template>

<script>
export default {
    name: 'StatsCard',
    props: ['icon', 'label', 'count', 'loading'],
};
</script>