<template lang="pug">
.stats-container.mb-3
    .title.px-1
        span.fas.fa-info-circle
        | Total Stats
    .stats
        stats-card(icon='fa-male', label='Males', :count='stats.male', :loading='df.fetching')
        stats-card(
            icon='fa-female',
            label='Females',
            :count='stats.female',
            :loading='df.fetching'
        )
</template>

<script>
import StatsCard from '@components/statsCard';
import DataFetcher from '@rheas/vuer/classes/DataFetcher';

export default {
    name: 'Stats',
    mounted: function () {
        this.df.fetchData(null, this.onSuccess);
    },
    data: function () {
        return {
            stats: { male: 0, female: 0 },
            df: new DataFetcher('/api/stats'),
        };
    },
    methods: {
        onSuccess: function (stats) {
            this.stats = stats;
        },
    },
    components: { StatsCard },
};
</script>