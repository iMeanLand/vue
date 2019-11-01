<template>
    <div>
       <span v-if="direction == null || !active" class="sort">
            {{ column }}
        </span>
        <span v-else-if="direction === 'ASC' && active" class="sort-top">
            {{ column }}
            <i class="fas fa-long-arrow-alt-up"></i>
        </span>
        <span v-else-if="direction === 'DESC' && active" class="sort-down">
            {{ column }}
            <i class="fas fa-long-arrow-alt-down"></i>
        </span>
    </div>
</template>

<script>
    export default {

        props: ['column', 'direction', 'active']

    }
</script>