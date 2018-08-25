<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>

    <table id="row-select" class="display table table-borderd table-hover">
                                      <thead>
                                          <tr>
                                              <th>Nom et prénoms</th>
                                              <th>Nom de la personne visitée</th>
                                              <th>Heure d'entrée</th>
                                              <th>Heure de sortie</th>
                                              <th>Date</th>
                                               <th></th>
                                              
                                          </tr>
                                      </thead>
                                      <tbody>
                                          @foreach(session('tab') as $key1=>$element1)
                                                  @foreach ($element1 as $key2 => $element2) 
                                                      
                                                      <tr>
                                                              <td>{{ $element2["nom"]}}</td>
                                                              <td>{{ $element2["nom_hote"]}}</td>
                                                              <td>{{ $element2["heure"]}}</td>
                                                              <td>{{ $element2["heure_sortie"]}}</td>
                                                              <td>{{ $element2["date_visite"]}}</td>
                                                              
                                                     </tr>
                                                  @endforeach
                                          @endforeach


                                  </table>
                                  
                                  
                              </tbody>
  </body>
</html>