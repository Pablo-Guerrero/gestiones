<template>
    <div>
      <h1>Gestión de Usuarios y Roles</h1>
  
      <table>
        <thead>
          <tr>
            <th>Nombre</th>
            <th>Email</th>
            <th>Roles</th>
            <th>Acciones</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="user in users" :key="user.id">
            <td>{{ user.name }}</td>
            <td>{{ user.email }}</td>
            <td>
              <span v-for="role in user.roles" :key="role.id">{{ role.name }}</span>
            </td>
            <td>
              <button @click="assignRole(user.id, 'admin')">Asignar Admin</button>
              <button @click="removeRole(user.id, 'admin')">Quitar Admin</button>
              <button @click="assignRole(user.id, 'user')">Asignar Usuario</button>
              <button @click="removeRole(user.id, 'user')">Quitar Usuario</button>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </template>
  
  <script>
  import axios from 'axios';
  
  export default {
    data() {
      return {
        users: [],
      };
    },
    methods: {
      fetchUsers() {
        axios.get('/api/users')
          .then(response => {
            this.users = response.data;
          });
      },
      assignRole(userId, role) {
        axios.post(`/api/users/${userId}/assign-role`, { role })
          .then(() => {
            this.fetchUsers();
          });
      },
      removeRole(userId, role) {
        axios.post(`/api/users/${userId}/remove-role`, { role })
          .then(() => {
            this.fetchUsers();
          });
      },
    },
    mounted() {
      this.fetchUsers();
    },
  };
  </script>
  