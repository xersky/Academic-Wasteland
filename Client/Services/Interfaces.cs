using System;
using System.IO;
using System.Threading.Tasks;
using Microsoft.Extensions.Logging;
using System.Collections.Generic;
using Client2.Models;
using System.Linq;
using Client2.Extensions;

namespace Client2.Services
{
    public interface ILocalStorage
    {
        Task SaveAsync<T>(string name, T item) where T : class;
        Task DeleteAsync(string name);
        Task<T> FetchAsync<T>(string name) where T : class;

    }
    public interface ISnapshot {
        Task TakeSnapshotAsync(DbService.Snapshot snapshot);
        Task<DbService.Snapshot> GetSnapshotAsync();
    }
    public interface IDbLayer
    {
        void LoadFromSnapshot(DbService.Snapshot snap);
        DbService.Snapshot Snap { get; }
        void Add(AnnouncementT announcement);
        void Remove(AnnouncementT announcement);
        void Update(AnnouncementT announcement);
        AnnouncementT GetA(int id);
        IEnumerable<AnnouncementT> GetA(int id, State mode);
        IEnumerable<AnnouncementT> GetAAll();
        void Add(UserT user);
        void Remove(UserT user);
        void Update(UserT user);
        UserT GetU(int id);
        IEnumerable<UserT> GetUAll();
        void Add(ReviewT review);
        void Remove(ReviewT review);
        void Update(ReviewT review);
        ReviewT GetS(int id);
        IEnumerable<ReviewT> GetSAll();
        void Add(ReservationT Rerservation);
        void Remove(ReservationT Rerservation);
        void Update(ReservationT Rerservation);
        ReservationT GetR(int id);
        IEnumerable<ReservationT> GetR(int id, State mode);
        IEnumerable<ReservationT> GetRAll();
    }
    public interface IAuthentificator {
        Task<UserT> Login(string login, string password);
        Task Logout();
        void Register(UserT user);
        Task<bool> IsLoggedIn();
    }

}
