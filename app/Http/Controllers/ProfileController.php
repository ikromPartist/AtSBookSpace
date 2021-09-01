<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\BookedBook;
use App\Models\TakenBook;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function index()
    {
        $id = session()->get('loggedUser');
        $user = User::find($id);

        $type = session('profile_link');
        if (!$type) {
            session(['profile_link' => 'profile']);
            $type = 'profile';
        }

        switch ($type) {
            case 'members':

                $members = User::select('id', 'company_id', 'name', 'surname', 'read_pages')
                                    ->withCount('taken_books')
                                    ->orderBy('name', 'asc')
                                    ->paginate(12);

                $rank = $members->firstItem();

                return view('profile.index', compact('members', 'rank'))->render();

                break;

            case 'read_books':

                $readBooks = TakenBook::select('taken_books.id', 'taken_books.user_id', 'taken_books.book_id')
                                        ->where('taken_books.user_id', $id)
                                        ->join('books', 'taken_books.book_id', '=', 'books.id')
                                        ->orderBy('books.title')
                                        ->paginate(12);

                $rank = $readBooks->firstItem();

                return view('profile.index', compact('readBooks', 'rank'));

                break;

            case 'activities':

                $activities = User::find($user->id)
                                    ->actions()
                                    ->orderBy('end', 'desc')
                                    ->paginate(12);

                $rank = $activities->firstItem();

                return view('profile.index', compact('activities', 'rank'));

                break;

            case 'presentation':

                $books = Book::select('id', 'title', 'code')
                                ->orderBy('title')
                                ->get();

                return view('profile.index', compact('books'));

                break;

            case 'booked_books':

                $bookedBooks = BookedBook::where('user_id', $id)
                                            ->get();

                return view('profile.index', compact('bookedBooks'));

                break;

            case 'liked_books':

                return view('profile.index');

                break;

            default:
                // Find user's position in rating
                $users = User::select('id', 'read_pages')
                                ->orderBy('read_pages', 'desc')
                                ->get();

                $usersCount = count($users);
                $userPosition = 0;
                for ($i = 0; $i < $usersCount; $i++) {
                    if ($users[$i]->id == $user->id) {
                        $userPosition = $i;
                    }
                }
                // Emoji construct
                $userRating = 100 - (($userPosition * 100) / $usersCount);

                return view('profile.index', compact('userRating', 'userPosition', 'usersCount'));

                break;
        }
    }    

    public function single($id)
    {
        $user = User::find($id);

        // Find user's position in rating
        $users = User::select('id', 'read_pages')
                        ->orderBy('read_pages', 'desc')
                        ->get();

        $usersCount = count($users);
        $userPosition = 0;
        for ($i = 0; $i < $usersCount; $i++) {
            if ($users[$i]->id == $user->id) {
                $userPosition = $i;
            }
        }
        // Emoji construct
        $userRating = 100 - (($userPosition * 100) / $usersCount);
        // Emoji construct
        $userRating = 100 - (($userPosition * 100) / $usersCount);

        return view('profile.single', compact('user', 'userRating', 'userPosition', 'usersCount'));
    }

    public function avatarUpdate(Request $request)
    {
        $id = session()->get('loggedUser');
        $user = User::find($id);
        $file = $request->file('avatar');

        if ($file)
        {
            // Delete previous avatar when exists
            if ($user->avatar != 'default.png')
            {
                $path = public_path('img/users/' . $user->avatar);
                if (file_exists($path))
                {
                    unlink($path);
                }
            }
            // Store new avatar
            $path = public_path('img/users');
            $fileName = uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move($path, $fileName);
            // Update user's avatar
            $user->avatar = $fileName;
            $user->save();
        }

        return redirect()->back();
    }

    public function userinfoUpdate(Request $request)
    {
        $id = session()->get('loggedUser');
        $user = User::find($id);
        // Validate user's fields
        $request->validate([
            'name' => 'required|min:3',
            'surname' => 'required|min:3',
            'last_name' => 'required|min:5',
            'email' => 'required|email',
            'phone_numbers' => 'required|min:9'
        ]);
        if ($request->login != $user->login)
        {
            $request->validate([
                'login' => 'required|min:3|unique:users',
            ]);
        }        
        // Update user's fields
        $user->name = $request->name;
        $user->surname = $request->surname;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->phone_numbers = $request->phone_numbers;
        $user->login = $request->login;
        $user->save();

        return redirect()->back(); 
    }

    public function passwordUpdate(Request $request)
    {
        $id = session()->get('loggedUser');
        $user = User::find($id);

        if (Hash::check($request->password, $user->password)) {
            if ($request->newpassword == $request->confirmpassword) {
                $user->password = bcrypt($request->newpassword);
                $user->save();
                return 'success';
            }
            return 'newPasswordDoesntMatch';
        }

        return 'passwordNotMatched';
    }

    public function fetchData(Request $request)
    {
        $id = session()->get('loggedUser');
        $user = User::find($id);
        $type = $request->get('type');

        session(['profile_link' => $type]);

        if ($request->ajax())
        {
            switch ($type) {
                case 'members':

                    $members = User::select('id', 'company_id', 'name', 'surname', 'read_pages')
                                        ->withCount('taken_books')
                                        ->orderBy('name', 'asc')
                                        ->paginate(12);

                    $rank = $members->firstItem();

                    return view('profile.data.members', compact('members', 'rank'))->render();

                    break;

                case 'read_books':

                    $readBooks = TakenBook::select('taken_books.id', 'taken_books.user_id', 'taken_books.book_id')
                                            ->where('taken_books.user_id', $id)
                                            ->join('books', 'taken_books.book_id', '=', 'books.id')
                                            ->orderBy('books.title')
                                            ->paginate(12);

                    $rank = $readBooks->firstItem();

                    return view('profile.data.read_books', compact('readBooks', 'rank'));

                    break;

                case 'activities':

                    $activities = User::find($user->id)
                                        ->actions()
                                        ->orderBy('end', 'desc')
                                        ->paginate(12);

                    $rank = $activities->firstItem();

                    return view('profile.data.activities', compact('activities', 'rank'));

                    break;

                case 'presentation':

                    $books = Book::select('id', 'title', 'code')
                                    ->orderBy('title')
                                    ->get();

                    return view('profile.data.presentation', compact('books'));

                    break;

                case 'booked_books':

                    $bookedBooks = BookedBook::where('user_id', $id)
                                                ->get();

                    return view('profile.data.booked_books', compact('bookedBooks'));

                    break;

                case 'liked_books':

                    return view('profile.data.liked_books');

                    break;
                
                default:
                    // Find user's position in rating
                    $users = User::select('id', 'read_pages')
                                    ->orderBy('read_pages', 'desc')
                                    ->get();

                    $usersCount = count($users);
                    $userPosition = 0;
                    for ($i = 0; $i < $usersCount; $i++) {
                        if ($users[$i]->id == $user->id) {
                            $userPosition = $i;
                        }
                    }
                    // Emoji construct
                    $userRating = 100 - (($userPosition * 100) / $usersCount);

                    return view('profile.data.profile', compact('userRating', 'userPosition', 'usersCount'));

                    break;
            }
        }
    }
}
