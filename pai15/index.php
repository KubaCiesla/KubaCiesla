<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <title>Tabela z filtrem i sortowaniem</title>
    <link type="text/css" rel="stylesheet" href="https://unpkg.com/bootstrap@4.5.3/dist/css/bootstrap.min.css"/>
    <link type="text/css" rel="stylesheet" href="https://unpkg.com/bootstrap-vue@2.21.0/dist/bootstrap-vue.css"/>
    <script src="https://unpkg.com/vue@2.6.12/dist/vue.js"></script>
    <script src="https://unpkg.com/babel-polyfill@latest/dist/polyfill.min.js"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
      <!-- Bootstrap działa standardowo z jQuery, ta wersja biblioteki integruje BS z VUE: -->
    <script src="https://unpkg.com/bootstrap-vue@2.21.0/dist/bootstrap-vue.js"></script>
  </head>

  <body>
    <h1>Tabela reaktywna VUE</h1>
     
    <div id="app">
      <b-container><!-- Kontener Bootstrap-->
        <b-form-group horizontal label="Filtrowanie tabeli" class="mb-0">
          <b-input-group>
            <b-form-input v-model="filter" placeholder="Czego szukasz?" />
               </b-input-group>
          </b-form-group>    
         <template>
             <b-table striped hover
                      :items="items"
                      :fields="fields"
                      :filter="filter"
                      @row-clicked="rowClickHandler"
                    >
             </b-table>
          </template>
       
        </b-container>
    </div>
     
    <script>        
      window.app = new Vue({
        el: "#app",
        data: {
          filter: '',
          items: [ //tę tablicę trzeba wczytać z JSONa na serwerze zazwyczaj, my tu wpiszemy na sztywno:
            { isActive: true, age: 40, first_name: 'Dickerson', last_name: 'Macdonald' },
            { isActive: false, age: 21, first_name: 'Larsen', last_name: 'Shaw' },
            { isActive: false, age: 89, first_name: 'Geneva', last_name: 'Wilson' },
            { isActive: true, age: 38, first_name: 'Jami', last_name: 'Carney' }
          ],
          fields:
            [
             {
                key: "isActive", //kolumna z JSON
                sortable: false, //czy włączyć sortowanie dla tej kolumny
                label: "Aktywny" //Nagłówek tabeli
            },
            {
                key: "age",
                sortable: true,
                label: "Wiek"
            },
            {
                key: "first_name",
                sortable: true,
                label: "Imię"
            },
                           {
                key: "last_name",
                sortable: true,
                label: "Nazwisko"
            }
               
            ]
        },
         
         methods:
           {
                rowClickHandler: function(record, index) {
                //zdarzenie kliknięcia w wiersz
                axios
                        .get('http://localhost/pai15/json_select.php')
                        .then( response => this.items = response.data); //może zostać dodany  
                }
         }
       
      });
</script>
  </body>
</html>