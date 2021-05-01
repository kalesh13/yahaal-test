<template lang="pug">
main.container
    sidebar.col-4(@filteredUsers='onSuccess', @onReset='initFetch')
    .map-container.w-100.px-2.d-flex
        map-widget(:users='users', :api-key='api')
</template>

<script>
import MapWidget from '@components/map';
import Sidebar from '@components/sidebar';
import DataFetcher from '@rheas/vuer/classes/DataFetcher';

export default {
    name: 'HomePage',
    props: ['api'],
    mounted: function () {
        this.initFetch();
    },
    data: function () {
        return {
            users: [],
            df: new DataFetcher('/api/users'),
        };
    },
    methods: {
        initFetch: function () {
            this.df.fetchData(null, this.onSuccess);
        },
        onSuccess: function (users) {
            this.users = users;
        },
    },
    components: { Sidebar, MapWidget },
};
</script>