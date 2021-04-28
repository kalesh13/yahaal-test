<template lang="pug">
main.container
    sidebar.col-4
        filters(@onSubmit='applyFilter', :submitted='df.fetching', :errors='df.errors')
    .map-container.w-100.px-2.d-flex
        map-widget(:users='users', :api-key='api')
</template>

<script>
import MapWidget from '@components/map';
import Filters from '@components/filters';
import Sidebar from '@components/sidebar';
import DataFetcher from '@rheas/vuer/classes/DataFetcher';

export default {
    name: 'HomePage',
    props: ['api'],
    mounted: function () {
        this.df.fetchData(null, this.onSuccess);
    },
    data: function () {
        return {
            users: [],
            df: new DataFetcher('/api/users'),
        };
    },
    methods: {
        onSuccess: function (users) {
            this.users = users;
        },
        applyFilter: function (filters) {
            let url = '/api/users?' + this.getQuery(filters);

            this.df.fetchData(url, this.onSuccess);
        },
        getQuery: function (params) {
            let query = [];

            for (let key in params) {
                if (params.hasOwnProperty(key) && null !== params[key]) {
                    query.push(encodeURIComponent(key) + '=' + encodeURIComponent(params[key]));
                }
            }
            return query.join('&');
        },
    },
    components: { Sidebar, Filters, MapWidget },
};
</script>