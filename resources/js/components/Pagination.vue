<template>
  <div v-if="links.length > 3">
    <div class="pagination">
      <template v-for="(link, key) in links">
        <div v-if="link.url === null" :key="key" class="mr-1 mb-1 px-3 py-2 text-sm leading-4 text-gray-400 border rounded" v-html="link.label" />
        <inertia-link v-else :key="key" class="page-link mr-1 mb-1 px-3 py-2 text-sm leading-4 border rounded hover:bg-white focus:border-indigo-500 focus:text-indigo-500" :class="{ 'active': link.active }" :href="link.url" v-html="link.label" />
      </template>
    </div>
  </div>
</template>

<script>
import {InertiaLink} from "@inertiajs/inertia-vue";

export default {
  props: {
    links: Array,
  },
  components : {
    InertiaLink
  }
}
</script>