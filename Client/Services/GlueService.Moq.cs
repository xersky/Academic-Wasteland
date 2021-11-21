using System;
using System.Threading.Tasks;
using System.IO;
using Microsoft.Extensions.Logging;
using System.Collections.Generic;
using Client2.Models;
using System.Linq;
using Client2.Extensions;
namespace Client2.Services
{
    public class Snapshot : ISnapshot {
        private readonly ILocalStorage _localStorage;
        public Snapshot(ILocalStorage localStorage)
        {
            _localStorage = localStorage;
        }
        public async Task TakeSnapshotAsync(DbService.Snapshot snapshot){
            await _localStorage.SaveAsync("db", snapshot);
        }
        public async Task<DbService.Snapshot> GetSnapshotAsync(){
            return await _localStorage.FetchAsync<DbService.Snapshot>("db");
        }
    }
    public class DbService : IDbLayer {
        public  class Snapshot {
            public List<AnnouncementT> Announcements {get; set;}
            public List<UserT> Users {get; set;}
            public List<ReviewT> Reviews {get; set;}
            public List<ReservationT> Reservations {get; set;}
        }
        public void LoadFromSnapshot(DbService.Snapshot snapshot){
            _announcements = snapshot.Announcements;
            _users = snapshot.Users;
            _reviews = snapshot.Reviews;
            _reservations = snapshot.Reservations;
            foreach (var user in _users)
            {
                System.Console.WriteLine($"u:{user.email} p:{user.password} r:{user.role}\n");
            }
        }
        public async Task LoadFromSnapshotAsync(){
            var snap = await _camera.GetSnapshotAsync();
            LoadFromSnapshot(snap);
        }
        private List<AnnouncementT> _announcements;
        private List<UserT> _users;
        private List<ReviewT> _reviews;
        private List<ReservationT> _reservations;
        private ILocalStorage _store;
        private ISnapshot _camera;
        public Snapshot Snap => new Snapshot {
            Announcements   = _announcements,
            Users           = _users,
            Reviews         = _reviews,
            Reservations    = _reservations
        };
        public DbService(ILocalStorage localStorage, ISnapshot camera) {
            _store = localStorage; _camera = camera;
            _announcements = Enumerable.Range(1, 10).Select(i => TypeEnhancements.getRandomeAnn()).ToList();
            _reservations = Enumerable.Range(1, 10).Select(i => TypeEnhancements.getRandomRes()).ToList();
            _users = Enumerable.Range(1, 10).Select(i => TypeEnhancements.getRandomePer()).ToList();
            _reviews = Enumerable.Range(1, 10).Select(i => TypeEnhancements.getRandomRev()).ToList();
            LoadFromSnapshotAsync();
            foreach (var user in _users)
            {
                System.Console.WriteLine($"u:{user.email} p:{user.password} r:{user.role}\n");
            }
        }

        // Annoucements Part
            public void Add(AnnouncementT announcement) {
                _announcements.Add(announcement);
                _camera.TakeSnapshotAsync(Snap);
            }
            public AnnouncementT GetA(int id) {
                var a = _announcements.FirstOrDefault(a => a.id == id);
                try {
                    a.AvgRating = (int)(GetSAll().Where(r => r.announcementID == a.id).Select(r => r.rating).Average());
                } catch(Exception){
                    a.AvgRating = 0;
                }
                return a;
            }
            public IEnumerable<AnnouncementT> GetAAll() {
                return _announcements.Select(a => {
                    try {
                        a.AvgRating = (int)(GetSAll().Where(r => r.announcementID == a.id).Select(r => r.rating).Average());
                    } catch(Exception){
                        a.AvgRating = 0;
                    }
                    return a;
                }).ToList();
            }
            public void Remove(AnnouncementT announcement) {
                _announcements = _announcements.Where(a => a.id != announcement.id).ToList();
                _camera.TakeSnapshotAsync(Snap);
            }
            public void Update(AnnouncementT announcement) {
                _announcements = _announcements.Select(a => a.id == announcement.id ? announcement : a).ToList();
                _camera.TakeSnapshotAsync(Snap);
            }
            public IEnumerable<AnnouncementT> GetA(int id, State mode) {
                return mode switch {
                    State.Rentee => _reservations.Where(r => r.users.Any(u => u.id == id))
                                                 .Select(r => r.announcementId)
                                                 .Select(aid => _announcements.FirstOrDefault(a => a.id == aid))
                                                 .Where(a => a != null)
                                                 .ToList(),
                    State.Renter => _announcements.Where(a => a.idOwner != id).ToList(),
                    _ => _announcements
                };
            }
        // Reservations Part
            public void Add(ReservationT Rerservation){
                _reservations.Add(Rerservation);
                System.Console.WriteLine($"{_reservations.Count()}\n");
                _camera.TakeSnapshotAsync(Snap);
            }
            public void Remove(ReservationT Rerservation){
                _reservations = _reservations.Where(r => r.id != Rerservation.id).ToList();
                _camera.TakeSnapshotAsync(Snap);
            }
            public void Update(ReservationT Rerservation){
                _reservations = _reservations.Select(r => r.id == Rerservation.id ? Rerservation : r).ToList();
                System.Console.WriteLine($"{_reservations.Count()}\n");
                _camera.TakeSnapshotAsync(Snap);
            }
            public ReservationT GetR(int id){
                return _reservations.FirstOrDefault(r => r.id == id);
            }
            public IEnumerable<ReservationT> GetR(int id, State mode){
                return mode switch {
                    State.Rentee => _reservations.Where(r => r.users.Any(u => u.id == id)).ToList(),
                    State.Renter => _reservations.Where(r => r.owner.id == id).ToList(),
                    _ => _reservations
                };
            }
            public IEnumerable<ReservationT> GetRAll() {
                return _reservations;
            }
        // Users Layer
            public void Add(UserT user){
                _users.Add(user);
                foreach (var usert in _users)
                {
                    System.Console.WriteLine($"u:{usert.email} p:{usert.password} r:{usert.role}\n");
                }
                _camera.TakeSnapshotAsync(Snap);
            }
            public void Remove(UserT user){
                _users = _users.Where(u => u.id != user.id).ToList();
                _camera.TakeSnapshotAsync(Snap);
            }
            public void Update(UserT user){
                _users = _users.Select(u => u.id == user.id ? user : u).ToList();
                _camera.TakeSnapshotAsync(Snap);
            }
            public UserT GetU(int id){
                return _users.FirstOrDefault(u => u.id == id);
            }
            public IEnumerable<UserT> GetUAll(){
                return _users;
            }
        // Reviews Layer
            public void Add(ReviewT review){
                _reviews.Add(review);
                _camera.TakeSnapshotAsync(Snap);
            }
            public void Remove(ReviewT review){
                _reviews = _reviews.Where(r => r.id != review.id).ToList();
                _camera.TakeSnapshotAsync(Snap);
            }
            public void Update(ReviewT review){
                _reviews = _reviews.Select(r => r.id == review.id ? review : r).ToList();
                _camera.TakeSnapshotAsync(Snap);
            }
            public ReviewT GetS(int id){
                return _reviews.FirstOrDefault(r => r.announcementID == id);
            }
            public IEnumerable<ReviewT> GetSAll(){
                return _reviews;
            }
    }
}