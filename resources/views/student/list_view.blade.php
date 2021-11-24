<table class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Name</th>
                      <th>Age</th>
                      <th>Gender</th>
                      <th>Reporting Teacher</th>
                      <th class="text-right">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @if(count($results) > 0)
                    @foreach ($results as $data)
                    <tr>
                      <td>{{ $data->id }}</td>
                      <td>{{ $data->name }}</td>
                      <td>{{ $data->age }}</td>
                      <td>{{ config('constant.Gender')[$data->gender] }}</td>
                      <td>{{ config('constant.Reporting_teachers')[$data->reporting_teacher] }}</td>
                      <td class="text-right"><div class="btn-group">
                        <a href="{{ url('student/'.$data->id.'/edit') }}" class="btn btn-default"><i class="fas fa-pencil-alt"></i></a>
                              <a href="javascript:void(0)" onclick="deletePop('student/' + {{ $data->id }})" class="btn btn-default"> <i class="far fa-trash-alt"></i></a>
        
                      </div></td>
                    </tr>
                    @endforeach
                    @else
                    <tr>
                      <td colspan="6" class="text-center">No data found</td>
                    </tr>
                    @endif
                    
                    
                  </tbody>
                </table>
                <div class="d-flex justify-content-end first">{{ $results->render() }}</div>