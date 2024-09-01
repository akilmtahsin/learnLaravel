<h1>About All Info</h1>

<table border="1">
  <tr>
    <th>Id</th>
    <th>Title</th>
    <th>Details</th>
    <th>Image</th>
    <th>Action</th>
  </tr>

  @foreach($abouts as $about)
  <tr>
    <td>{{ $about->id }}</td>
    <td>{{ $about->title }}</td>
    <td>{{ $about->details }}</td>
    <td><img src="{{ asset('upload/about_images/'.$about->image) }}" alt="" width="100"></td>
    <td>
      <a href="{{ route('about.edit', $about->id) }}">Edit</a>
      <form action="{{ route('about.delete', $about->id) }}" method="POST">

        @csrf
        @method('DELETE')
        <button type="submit">Delete</button>
      </form>
     
    </td>
  </tr>
  @endforeach
</table>