<template>
    <h3>Test Vue3 Component OK, {{ foo }}</h3>
    <div>{{ word }} : {{ getName }}</div>
</template>

<script>

export default {
  props: ['foo'],
  data() {
    return {
      word: 'test',
      getName: '',
    }
  },

  mounted(){
    const vm = this
    axios.get('https://randomuser.me/api/').then(res => {
      console.log(res.data);
      console.log(res.data.results[0].name.first);
      vm.getName = res.data.results[0].name.first;
    })
  }

}
</script>