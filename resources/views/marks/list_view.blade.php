<table class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Name</th>
                      <th>Maths</th>
                      <th>Science</th>
                      <th>History</th>
                      <th>Term</th>
                      <th>Total Marks</th>
                      <th>Created On</th>
                      <th class="text-right">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $i=1;?>
                    @if(count($results) > 0)
                    @foreach ($results as $data)
                    <tr>
                      <td>{{$i++}}</td>
                      <td>{{ $data->student->name }}</td>
                      <td>{{ $data->maths_mark }}</td>
                      <td>{{ $data->scince_mark }}</td>
                      <td>{{ $data->history_mark }}</td>
                      <td>{{ config('constant.terms')[$data->term] ?? '' }}</td>
                      <td>{{$data->total}}</td>
                      <td>{{date('F d Y h:i:s A', strtotime($data->created_at))}}</td>
                      <td class="text-right"><div class="btn-group">
                        <a href="{{ url('marks/'.$data->id.'/edit') }}" class="btn btn-default"><i class="fas fa-pencil-alt"></i></a>
                              <a href="javascript:void(0)" onclick="deletePop('marks/' + {{ $data->id }})" class="btn btn-default"> <i class="far fa-trash-alt"></i></a>
        
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